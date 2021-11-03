import axios from "axios";
import React, { useEffect } from "react";
import { Redirect } from "react-router";
import {
    BrowserRouter, Route,
    RouteProps,
    Switch
} from "react-router-dom";
import { useRecoilState } from "recoil";
import Layout from './Layout';
import DashBoard from './pages/dashboard';
import NotFoundPage from './pages/error';
import LoginPage from "./pages/login";
import ProfilePage from "./pages/profile";
import RegisterPage from "./pages/register";
import { isLoginState, userDataState } from "./recoil/userState";

const Router =() => {
   const [isLogin,setIsLogin] = useRecoilState(isLoginState);
   const [userData,setUserData] = useRecoilState(userDataState);

    useEffect(() => {
        axios
            .get("api/user")
            .then((res) => {
                setIsLogin(true)
                setUserData(res.data)
            })
            .catch((err) => {
                setIsLogin(false)
                console.error(err);
            });
    }, []);

    const GuardRoute = (props: RouteProps) => {
        if (!isLogin) return <Redirect to="/login" />;
        return <Route {...props} />;
    };

    const LoggedRoute = (props: RouteProps) => {
        if (isLogin) return <Redirect to="/" />;
        return <Route {...props} />;
    };

    return (
        <BrowserRouter>
            <Switch>
                <LoggedRoute path="/login">
                    <LoginPage />
                </LoggedRoute>
                <LoggedRoute path="/register">
                    <RegisterPage />
                </LoggedRoute>
                <Layout>
                    <Route path="/user/profile">
                        <ProfilePage />
                    </Route>
                    <Route path="/page">page</Route>
                    <GuardRoute exact path="/">
                        <DashBoard />
                    </GuardRoute>
                </Layout>
                <Route component={NotFoundPage} />
            </Switch>
        </BrowserRouter>
    );
}


export default Router

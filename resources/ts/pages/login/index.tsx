import {
    Button,
    Checkbox,
    Col,
    Form,
    Input,
    Row,
    Space,
    Typography,
} from "antd";
import React, { FC } from "react";
import { Controller, useForm } from "react-hook-form";
import { Redirect } from "react-router";
import { Link } from "react-router-dom";
import { useRecoilState } from "recoil";
import { isLoginState, userDataState } from "../../recoil/userState";
import { useLogin } from "../../swr/useUser";
import { LoginData } from "../../types/User";

const { Title, Text } = Typography;

const JstStreamMark = (params) => {
    return (
        <svg
            className="w-16 h-16"
            viewBox="0 0 48 48"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path
                d="M11.395 44.428C4.557 40.198 0 32.632 0 24 0 10.745 10.745 0 24 0a23.891 23.891 0 0113.997 4.502c-.2 17.907-11.097 33.245-26.602 39.926z"
                fill="#6875F5"
            ></path>
            <path
                d="M14.134 45.885A23.914 23.914 0 0024 48c13.255 0 24-10.745 24-24 0-3.516-.756-6.856-2.115-9.866-4.659 15.143-16.608 27.092-31.75 31.751z"
                fill="#6875F5"
            ></path>
        </svg>
    );
};

const LoginPage: FC = () => {
    const { register, handleSubmit, control, watch } = useForm<LoginData>();
    const [isLogin, setIsLogin] = useRecoilState(isLoginState);
    const [userData, setUserData] = useRecoilState(userDataState);

    return (
        <Row
            align="middle"
            justify="center"
            style={{ height: "100vh" }}
            className="bg-gray-100"
        >
            {isLogin && <Redirect to="/" />}
            <Col
                span={8}
                style={{ backgroundColor: "white" }}
                className="px-6 py-4 shadow-md overflow-hidden sm:rounded-lg"
            >
                <JstStreamMark />
                <Space direction="vertical">
                    <Form
                        name="basic"
                        labelCol={{ span: 8 }}
                        wrapperCol={{ span: 16 }}
                        initialValues={{ remember: true }}
                        autoComplete="off"
                    >
                        <Form.Item
                            label="Email"
                            name="email"
                            rules={[
                                {
                                    required: true,
                                    message: "Please input your username!",
                                },
                            ]}
                        >
                            <Controller
                                name="email"
                                control={control}
                                render={({ field }) => <Input {...field} />}
                            />
                        </Form.Item>
                        <Form.Item
                            label="Password"
                            name="password"
                            rules={[
                                {
                                    required: true,
                                    message: "Please input your password!",
                                },
                            ]}
                        >
                            <Controller
                                name="password"
                                control={control}
                                render={({ field }) => (
                                    <Input.Password {...field} />
                                )}
                            />
                        </Form.Item>
                        <Form.Item
                            name="remember"
                            valuePropName="checked"
                            wrapperCol={{ offset: 8, span: 16 }}
                        >
                            <Checkbox>Remember me</Checkbox>
                        </Form.Item>
                        <Space>
                            <Link
                                to="/register"
                                className="underline text-sm text-gray-600 hover:text-gray-900"
                            >
                                <Text type="secondary">Register</Text>
                            </Link>
                            <Link
                                to="/register"
                                className="underline text-sm text-gray-600 hover:text-gray-900"
                            >
                                <Text type="secondary">For got</Text>
                            </Link>
                        </Space>

                        <Form.Item wrapperCol={{ offset: 8, span: 16 }}>
                            <Button
                                type="primary"
                                htmlType="submit"
                                onClick={handleSubmit(async (data) => {
                                    const result = await useLogin(data);
                                    if (result) {
                                        setIsLogin(true);
                                        setUserData(result);
                                    } else {
                                        setIsLogin(false);
                                    }
                                })}
                            >
                                Login
                            </Button>
                        </Form.Item>
                    </Form>
                </Space>
            </Col>
        </Row>
    );
};

export default LoginPage;

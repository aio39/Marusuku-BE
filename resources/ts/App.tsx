import 'antd/dist/antd.css';
import React from "react";
import { RecoilRoot } from "recoil";
import { SWRConfig } from "swr";
import Router from "./router";

const App = () => {

    return (
        <SWRConfig value={{}}>
            <RecoilRoot>
                <Router />
            </RecoilRoot>
        </SWRConfig>
    );
};

export default App;

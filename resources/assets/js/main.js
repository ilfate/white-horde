import React from 'react';
import ReactDOM from 'react-dom';
import { Provider } from "react-redux";
import Router from './router';
import store from './store';

class MainApp extends React.Component
{
    constructor(props) {
        super(props);
        this.state = {
        };
    }

    updateLabel(label) {
        this.setState({inputLabel:label});
    }

    render()
    {
        return (
            <div>
                <Provider store={store}>
                    <Router />
                </Provider>
            </div>
        );

    }
}


// JSX
ReactDOM.render(<MainApp/>,
    document.getElementById('react-root'));
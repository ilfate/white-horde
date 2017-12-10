import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter, Route, Switch } from 'react-router-dom';
import Tribe from 'scenes/Tribe';
import NameYourTribe from 'scenes/NameYourTribe';

export const Routes = {
    NAME_TRIBE: 'name-your-tribe',
    LEARN_LORE: 'about-laad',
    TRIBE: 'tribe',
};

export default class Router extends React.Component
{
    constructor(props) {
        super(props);
        this.state = {
        };
    }

    redirect(page) {
        return <Redirect push to={ page }/>;
    }

    render()
    {
        return (
            <BrowserRouter>
                <Switch>
                    <Route exact path={ '/' } component={ Tribe }/>
                    <Route path={ '/' + Routes.TRIBE } component={ Tribe }/>
                    <Route path={ '/' + Routes.NAME_TRIBE } component={ NameYourTribe }/>
                </Switch>
            </BrowserRouter>
        );

    }
}
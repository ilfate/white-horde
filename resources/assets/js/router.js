import React from 'react';
import { BrowserRouter, Route, Switch } from 'react-router-dom';
import Tribe from 'scenes/Tribe';
import NameYourTribe from 'scenes/NameYourTribe';
import Combat from 'scenes/Combat';

export const Routes = {
    NAME_TRIBE: 'name-your-tribe',
    LEARN_LORE: 'about-laad',
    TRIBE: 'tribe',
    COMBAT: 'combat',
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
                    <Route path={ '/' + Routes.COMBAT } component={ Combat }/>
                </Switch>
            </BrowserRouter>
        );

    }
}
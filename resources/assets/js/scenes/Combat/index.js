import React from 'react';
import { Redirect } from 'react-router';
import { action1, init } from './actions';
import { bindActionCreators } from 'redux'
import { connect } from 'react-redux';
import { Routes } from 'router';
import Line from './components/Line';
import ActiveUnitInfoPanel from './components/ActiveUnitInfoPanel';
import CombatField from './components/CombatField';
import ActionsLog from './components/ActionsLog';

import {team1} from './test/team1';
import {team2} from './test/team2';

class Combat extends React.Component
{
    constructor(props) {
        super(props);
        const { dispatch } = props;
        this.boundActionCreators = bindActionCreators({action1, init}, dispatch);

        dispatch(init({team1, team2}));

        this.state = {
            isFinished: false
        };
    }

    redirectToTribe() {
        return <Redirect push to={ '/' + Routes.TRIBE }/>;
    }

    render()
    {
        const { dispatch, store } = this.props;
        if (this.state.isFinished) {
            return this.redirectToTribe();
        }

        return (
            <div className="main-combat-container">
                <Line units1={ store.team1.units } units2={ store.team2.units }/>
                <div>
                    <ActiveUnitInfoPanel type={'friendly'}/>
                    <CombatField />
                    <ActiveUnitInfoPanel type={'enemy'}/>
                </div>
                <ActionsLog />
            </div>
        );

    }
}

export default connect(state => ({store: state}))(Combat);
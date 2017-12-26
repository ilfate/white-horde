import React from 'react';
import { Redirect } from 'react-router';
import { usePreloadedTribe } from './actions';
import { bindActionCreators } from 'redux'
import { connect } from 'react-redux'
import { Routes } from 'router';

class Tribe extends React.Component
{
    constructor(props) {
        super(props);
        const { dispatch } = props;
        this.boundActionCreators = bindActionCreators({usePreloadedTribe}, dispatch);

        this.state = {
        };
        console.log('Tribe state on page load:');
        console.log(props.state.tribe);
    }

    // componentWillMount() {
    //     if (this.props.state.tribe.id === null) {
    //         const { dispatch } = this.props;
    //         let action = usePreloadedTribe();
    //         dispatch(action);
    //     }
    // }

    redirectToNameYourTribe() {
        return <Redirect push to={ '/' + Routes.NAME_TRIBE }/>;
    }

    render()
    {
        if (this.props.state.tribe.name === null) {
            return this.redirectToNameYourTribe();
        }

        return (
            <div>
                <h1>Tribe page</h1>
                <p>
                </p>
            </div>
        );

    }
}

export default connect(
    state => ({state: state})
)(Tribe);
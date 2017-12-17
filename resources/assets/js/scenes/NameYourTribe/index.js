import React from 'react';
import { connect } from 'react-redux';
import Form from './components/Form';
import { Routes } from 'router';
import { Redirect } from 'react-router';

class NameYourTribe extends React.Component
{
    constructor(props) {
        super(props);

        this.state = {
        };

    }

    redirectToTribePage() {
        return <Redirect push to={ '/' + Routes.TRIBE }/>;
    }

    render()
    {
        if (this.props.state.tribe.name !== null) {
            return this.redirectToTribePage();
        }
        return (
            <div>
                <Form />
            </div>
        );

    }
}

export default connect(
    state => ({state: state})
)(NameYourTribe);
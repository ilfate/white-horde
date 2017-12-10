import React from 'react';

export default class Button extends React.Component
{
    render() {
        return (
            <a onClick={ () => this.props.action(this.props.label) } className="btn btn-default">
                {this.props.label}
            </a>
        ); // JSX
    }
}

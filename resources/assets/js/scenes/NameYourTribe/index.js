import React from 'react';

export default class NameYourTribe extends React.Component
{
    constructor(props) {
        super(props);

        this.state = {
        };

    }

    render()
    {
        return (
            <div>
                <h1>Name your tribe</h1>
                <input type="text"/>
                <a className="btn btn-default">>></a>
            </div>
        );

    }
}
import React from 'react';


class LineUnit extends React.Component
{
    constructor(props) {
        super(props);


        this.handleClick = this.handleClick.bind(this);
    }



    handleClick() {
        // if (this.state.inputValue.length > 3) {
        //     const { dispatch } = this.props;
        //     sendTribeName(this.state.inputValue, dispatch);
        // }
    }

    render()
    {
        return (
            <div style={ {'textAlign': 'center'} }>
                {this.props.unit.name}
            </div>
        );

    }
}

export default LineUnit;
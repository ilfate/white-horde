import React from 'react';
import { bindActionCreators } from 'redux'
import { connect } from 'react-redux'
// import { sendTribeName } from "../actions";

class CombatField extends React.Component
{
    constructor(props) {
        super(props);

        this.state = {
            inputValue: '',
            buttonActive: false
        };
        const { dispatch } = this.props;
        // this.boundActionCreators = bindActionCreators({sendTribeName}, dispatch);

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
                CombatField
            </div>
        );

    }
}

export default connect(
    state => ({store: state.combat})
)(CombatField);
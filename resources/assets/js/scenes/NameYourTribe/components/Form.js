import React from 'react';
import { bindActionCreators } from 'redux'
import { connect } from 'react-redux'
import { sendTribeName } from "../actions";

class Form extends React.Component
{
    constructor(props) {
        super(props);

        this.state = {
            inputValue: '',
            buttonActive: false
        };
        const { dispatch } = this.props;
        this.boundActionCreators = bindActionCreators({sendTribeName}, dispatch);

        this.handleClick = this.handleClick.bind(this);
        this.updateInputValue = this.updateInputValue.bind(this);
    }

    updateInputValue(event) {
        const name = event.target.value;
        this.setState({
            inputValue: name,
            buttonActive: name.length > 3
        });

    }

    handleClick() {
        if (this.state.inputValue.length > 3) {
            const { dispatch } = this.props;
            sendTribeName(this.state.inputValue, dispatch);
        }
    }

    render()
    {
        return (
            <div style={ {'textAlign': 'center'} }>
                <h1>Name your tribe</h1>
                <input type="text" onChange={this.updateInputValue} placeholder="Your tribe name"/>
                <a disabled={ !this.state.buttonActive && "DISABLED"  }
                   style={ {margin: '0 0 0 15px'} }
                   className="btn btn-default"
                   onClick={ this.handleClick }>>></a>
            </div>
        );

    }
}

export default connect(
    state => ({state: state})
)(Form);
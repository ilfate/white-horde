import React from 'react';
import { bindActionCreators } from 'redux'
import { connect } from 'react-redux'
import LineUnit from "./LineUnit";

class Line extends React.Component
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

    sortTeams(team1, team2) {
        team1 = team1.map(unit => {unit.team = 1; return unit;});
        team2 = team2.map(unit => {unit.team = 2; return unit;});
        let units = team1.concat(team2);
        units.sort((unit1, unit2) => {
            if(unit1.initiative < unit2.initiative) return -1;
            if(unit1.initiative > unit2.initiative) return 1;
            return 0;
        });
        return units;
    }

    render()
    {
        const units = this.sortUnits(this.props.units1, this.props.units2);
        return (
            <div style={ {'textAlign': 'center'} }>
                { units.map((unit) => <LineUnit unit={unit} />) }
            </div>
        );

    }
}

export default connect(
    state => ({store: state.combat})
)(Line);
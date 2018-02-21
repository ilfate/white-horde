import {createStore, combineReducers} from "redux";

import { TribeReducer } from './reducers/TribeReducer';
import { GameReducer } from "./reducers/GameReducer";
import { CombatReducer } from "./reducers/CombatReducer";


const appReducer = combineReducers({
    tribe: TribeReducer,
    game: GameReducer,
    combat: CombatReducer,
});

const preloadedState = {
    tribe: [], game: []
};

export default createStore(
    appReducer,  // preloadedState,
    window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__()
);

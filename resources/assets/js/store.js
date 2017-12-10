import {createStore, combineReducers} from "redux";

import { TribeReducer } from './reducers/TribeReducer';


const appReducer = combineReducers({
    tribeReducer: TribeReducer
});

export default createStore(
    appReducer
);

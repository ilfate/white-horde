import axios from "axios";
import { UPDATE_TRIBE } from 'reducers/TribeReducer';


export function usePreloadedTribe() {

        const tribe = BACKEND_TRIBE;

        // we just created sell request
        // let`s check if this customer already have an account


        return {
            type: UPDATE_TRIBE,
            data: tribe
        }

}




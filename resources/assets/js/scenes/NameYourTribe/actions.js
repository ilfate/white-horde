import client from "services/HttpClient";
import { UPDATE_TRIBE } from 'reducers/TribeReducer';
import { LOADING } from 'reducers/GameReducer';
import { LOADED } from 'reducers/GameReducer';


export function sendTribeName(name, dispatch) {

    dispatch({type: LOADING, data:{}});
    return client
        .request('POST', "tribe/name", {data:{name}})
        .then((response) => {
            dispatch({type: LOADED, data:{}});
            if (!response.data.status === 'error') {
                // dispatch({type: SELL_REQUEST_LOADED, data:response.data.data});
            } else {
                 dispatch({type: UPDATE_TRIBE, data:{
                     id:response.data.data.id,
                     name:response.data.data.name,
                 }});
            }

        })
        .catch((response) => {
            dispatch({type: LOADED, data:{}});
            // dispatch({type: SELL_REQUEST_LOADED, data:{id:sellRequestId}});
        });

}




import axios from 'axios';

class HttpClient {}

HttpClient.prototype.request = (method, url, options = {}) => {

    let config = {
        url: `/api/v1/${ url }`,
        method,
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        responseType: "json",
        timeout: 15000,
    };

    // merge headers
    if (options['headers']) {
        options['headers'] = Object.assign(config['headers'], options['headers']);
    }

    // merge configuration
    config = Object.assign(config, options);

    return axios(config);
};

export default new HttpClient();

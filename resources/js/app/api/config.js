const url = baseState.home_route + '/api/';

const auth = {
    user_id: baseState.user.id,
    api_token: baseState.user.api_token
};

const errorMessages = {
    "422": "Podane dane są nieprawidłowe!",
    "500": "Coś jest nie tak z naszymi serwerami :C"
};

export {
    url, auth, errorMessages
}
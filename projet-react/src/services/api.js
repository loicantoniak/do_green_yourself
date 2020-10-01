const serverURL = "http://localhost:8000";
const baseAPI = "/api";

function getLoginURL(redirectURL) {
    const redirect = redirectURL ? "?redirect="+redirectURL : "";
    return serverURL + "/login" + redirect;
}

function corsFetch(url, cb = ()=>{}, options = {}) {
    const defaultOptions = {
        credentials: 'include',
    };
    return fetch(url, {...defaultOptions, ...options}).then(cb);
}

function logout(e) {
    e.preventDefault();
    return corsFetch(serverURL + "/logout", response => {
        if (response.ok) {
            window.location.href = window.location;
        }
    });
}

function getUser() {
    return corsFetch(serverURL+"/api/user", response => {
        const contentType = response.headers.get("content-type");
        if (response.ok && contentType && contentType.indexOf("application/ld+json") !== -1) {
            return response.json();
        }
        throw response;
    });
}

function getDataCollection() {
    return corsFetch(serverURL+"/api/data", response => {
        const contentType = response.headers.get("content-type");
        if (response.ok && contentType && contentType.indexOf("application/ld+json") !== -1) {
            return response.json();
        }
        throw response;
    });
}

export {
    getLoginURL,
    logout,
    getUser,
    getDataCollection,
};

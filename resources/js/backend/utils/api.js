import axios from "axios";

const $axios = axios.create({
    baseURL: "http://localhost:8000/api/bo",
    headers: {
        Authorization:
            localStorage.getItem("token") != "null"
                ? "Bearer " + localStorage.getItem("token")
                : "",
        "Content-Type": "application/json"
    }
});

export default $axios;

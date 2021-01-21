import axios from "axios";

export default axios.create({
  baseURL: "/v1",
  headers: {
    "Content-type": "application/json",
  },
});

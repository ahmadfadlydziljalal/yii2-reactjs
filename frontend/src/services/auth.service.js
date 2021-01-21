import http from "./common/http-common";
const API_URL = "auth";

class AuthService {
  index() {
    return http.get(API_URL + "/index");
  }
}

export default new AuthService();

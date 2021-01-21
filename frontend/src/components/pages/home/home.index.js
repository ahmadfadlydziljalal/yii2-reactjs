import React, { useEffect, useState } from "react";
import AuthService from "../../../services/auth.service";

const Home = () => {
  const [messageTitle, setMessageTitle] = useState({
    title: "Loading",
    subtitle: "Loading",
  });

  useEffect(() => {
    return AuthService.index()
      .then((response) => {
        setMessageTitle({
          title: "Congratulations...!",
          subtitle: response.data,
        });
      })
      .catch((error) => {
        setMessageTitle({
          title: "Sorry, terdapat masalah koneksi. ",
          subtitle:
            (error.response && error.response.data) ||
            error.message ||
            error.toString(),
        });
      }); // eslint-disable-next-line
  }, []);

  return (
    <div>
      <h1>{messageTitle.title}</h1>
      <h3>{messageTitle.subtitle}</h3>
    </div>
  );
};

export default Home;

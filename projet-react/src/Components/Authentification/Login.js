import React, { Component } from "react";
import "./Login.css";
import {Link} from "react-router-dom";

export default class Login extends Component {
  constructor(props) {
    super(props);

    this.state = {
      email: "",
      password: "",
      loginErrors: ""
    };

    this.handleSubmit = this.handleSubmit.bind(this);
    this.handleChange = this.handleChange.bind(this);
  }

  handleChange(event) {
    this.setState({
      [event.target.name]: event.target.value
    });
  }

  handleSubmit(event) {
    const { email, password } = this.state;

    fetch
      .post(
        "http://localhost:3001/sessions",
        {
          user: {
            email: email,
            password: password
          }
        },
        { withCredentials: true }
      )
      .then(response => {
        if (response.data.logged_in) {
          this.props.handleSuccessfulAuth(response.data);
        }
      })
      .catch(error => {
        console.log("erreur d'indentifiant", error);
      });
    event.preventDefault();
  }

  render() {
    return (
      <div>
        <form className="connexion" onSubmit={this.handleSubmit}>
          <input
            type="email"
            name="email"
            placeholder="Email"
            value={this.state.email}
            onChange={this.handleChange}
            required
          />
          <br/>

          <input
            type="password"
            name="password"
            placeholder="Mot de passe"
            value={this.state.password}
            onChange={this.handleChange}
            required
          />
          <br/>

          <button className="buttonCo" type="submit">Se connecter</button>
          <br/><br/>
          <Link to="/Profil">Mot de passe oublié</Link>
          <br/><br/><br/>
          <Link to="/inscription">
            <button className="buttonIns" type="submit">Créer un compte</button>
          </Link>
        </form>
      </div>
    );
  }
}
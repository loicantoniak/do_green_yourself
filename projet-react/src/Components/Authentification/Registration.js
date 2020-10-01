import React, { Component } from "react";
import "./Registration.css";

export default class Registration extends Component {
  constructor(props) {
    super(props);
    this.state = {
      sex:"M",
      name: "",
      firstname:"",
      address:"",
      postalCode:"",
      city:"",
      birthDate:"",
      country:"",
      pseudo:"",
      email: "",
      password: "",
      password2: "",
      isValidated: false,
    };

    this.handleSubmit = this.handleSubmit.bind(this);
    this.handleChange = this.handleChange.bind(this);
  }

  handleChange(event) {
    const target = event.target;
    const value = target.value;
    const name = target.name;
    this.setState({
        [name]: value
    });
}

    handleSubmit(e) {
      const {sex, name, firstname, birthDate, address, postalCode, city, country, pseudo, email} = this.state;
      if (this.state.password !== this.state.password2) {
          e.preventDefault();

          return false;
      }
      else {
          const password = this.state.password;
          const data = {sex, name, firstname, birthDate, address, postalCode, city, country, pseudo, email, password};
          const url = "http://127.0.0.1:8000/api/users";
    fetch(url, {
      method: 'POST',

      body: JSON.stringify(data), 

      headers: {
          'Content-Type': 'application/json',
      }
  })
      .then(res => res.json())

      .catch(error => console.error('Error:', error))
  this.setState({
      isValidated:true
  })

}

}

  render() {
    return (this.state.isValidated ?(<div>
      <div className="validation">Inscription validée!</div>
      </div>): (
      <div>
        <form className="inscription" onSubmit={this.handleSubmit}>

          <input
            type="text"
            name="name"
            placeholder="Nom"
            value={this.state.name}
            onChange={this.handleChange}
            required
          />
          <br/>
          <input
            type="text"
            name="firstname"
            placeholder="Prénom"
            value={this.state.firstname}
            onChange={this.handleChange}
            required
          />
          <br/>

          <input
            type="text"
            name="address"
            placeholder="Adresse"
            value={this.state.address}
            onChange={this.handleChange}
          />
          <br/>

          <input
            type="text"
            name="postalCode"
            placeholder="Code postal"
            value={this.state.postalCode}
            onChange={this.handleChange}
          />
          <br/>

          <input
            type="text"
            name="city"
            placeholder="Ville"
            value={this.state.city}
            onChange={this.handleChange}
          />
          <br/>
          <input
            type="date"
            name="birthDate"
            placeholder="Date de naissance"
            value={this.state.birthDate}
            onChange={this.handleChange}
          />
          <br/>
        
          

          <input
            type="text"
            name="country"
            placeholder="Pays"
            value={this.state.country}
            onChange={this.handleChange}
          />
          <br/>

          <select 
          type="text"
          name="sex"
          onChange={this.handleChange} 
          >
                  <option type="text" value="M">Homme</option>
                  <option type="text" value="F">Femme</option>
          </select>
          <br/>

          <input
            type="text"
            name="pseudo"
            placeholder="Pseudo"
            value={this.state.pseudo}
            onChange={this.handleChange}
          />
          <br/>

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

          <input
            type="password"
            name="password2"
            placeholder="Confirmation mot de passe"
            value={this.state.password2}
            onChange={this.handleChange}
            required
          />
          <br/><br/><br/><br/>
          <button className="buttonInscription" type="submit">Créer compte</button>
        </form>
      </div>
    ));
  }
}
import React from 'react'; 
import "./Contact.css";
import Title from '../Title/Title';
import "../Title/Title.css"

export default class App extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
          fname: '',
          lname: '',
          email: '',
          message: '',
          mailSent: false,
          error: null,
        }
      }

      handleSubmit(event) {
        event.preventDefault();
        console.log(this.state);
    
        fetch('http://127.0.0.1:8000/api/contact',{
            method: "POST",
            body: JSON.stringify(this.state),
            headers: {
              'Accept': 'application/json',
              'Content-Type': 'application/json'
            },
          }).then(
            (response) => (response.json())
           ).then((response)=>{
          if (response.status === 'success'){
            alert("Message envoyé."); 
            this.resetForm()
          }else if(response.status === 'fail'){
            alert("Le message n'a pas pu être transmit.")
          }
        })
      }
    
  
  render() {

   return(
    <div className="Contact">
      <div className="title">
        <Title name="Contactez-nous !"/>
      </div>
        <div className="row">
            <div className="col-4"></div>
            <div className="col-4 form">
                <form action="#" >
                    <label>Prénom</label>
                    <input className="emailContact" type="text" id="fname" name="firstname" placeholder="Votre prénom.."
                        value={this.state.fname}
                        onChange={e => this.setState({ fname: e.target.value })}
                    />
                    <label>Nom</label>
                    <input className="emailContact" type="text" id="lname" name="lastname" placeholder="Votre nom..."
                        value={this.state.lname}
                        onChange={e => this.setState({ lname: e.target.value })}
                    />


                    <label>Email</label>
                    <input className="emailContact" type="email" id="email" name="email" placeholder="Votre email..."
                        value={this.state.email}
                        onChange={e => this.setState({ email: e.target.value })}
                    />


                    <label>Message</label>
                    <textarea className="messageContact" id="message" name="message" placeholder="Votre message..."
                        onChange={e => this.setState({ message: e.target.value })}
                        value={this.state.message}
                    ></textarea>
                    <input type="submit" onClick={e => this.handleSubmit(e)} value="Envoyer" />
                </form >
            </div>
            <div className="col-4"></div>
        </div>
    </div>
        );
    }
}
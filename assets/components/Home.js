import React, {Component} from 'react';
import {Route, Switch,Redirect, Link, withRouter} from 'react-router-dom';
import axios from 'axios';
    

class Home extends Component {

    constructor(props) {
            super(props);
            this.state = {value: '', Textvalue: '', record: [], loading: false};
            // this.state = { };
            this.handleNameChange = this.handleNameChange.bind(this);
            this.handleNameSubmit = this.handleNameSubmit.bind(this);
            this.handleICOChange = this.handleICOChange.bind(this);
            this.handleICOSubmit = this.handleICOSubmit.bind(this);
          }

        handleNameChange(event) {    this.setState({Textvalue: event.target.value});  }

        handleNameSubmit(event) {
            let currentComponent = this;
              axios.post(`https://localhost:8000/api/by_name`, {
                              title : this.state.Textvalue
                            }).then(function (response) {
                                currentComponent.setState({ record: response.data, loading: false})
                              });
              event.preventDefault();
            }

        handleICOChange(event) {    this.setState({value: event.target.value});  }

        handleICOSubmit(event) {
                let currentComponent = this;
                  axios.post(`https://localhost:8000/api/by_ico`, {
                                  title : this.state.value
                                }).then(function (response) {
                                    console.log(response);
                                    currentComponent.setState({ record: response.data, loading: false})
                                  });
                // console.log(this.state.value);
                  event.preventDefault();
                }
    
    

    render() {
        const loading = this.state.loading;
        return (
           <div>
               <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
                   <Link className={"navbar-brand"} to={"/"}> Home </Link>
                   <div className="collapse navbar-collapse" id="navbarText">
                       <ul className="navbar-nav mr-auto">
                           <li className="nav-item">
                               <Link className={"nav-link"} to={"/records"}> Records </Link>
                           </li>
                       </ul>
                   </div>
               </nav>
               <div>
                 <section className="row-section">
                     <div className="container">
                         <div className="row">
                             <h2>Records</h2>
                         </div>
                         {loading ? (
                            <div className={'row text-center'}>
                            </div>
                        ) : (
                            <div className={'row'}>
                                { this.state.record.map(record =>
                                    <div className="col-md-10 offset-md-1 row-block" key={record.id}>
                                        <table id="sortable">
                                        <tbody>
                                            <tr>
                                            <td>
                                                <div className="reqContent">
                                    
                                                        <p>Obh. jméno: {record.Obh_jmeno}</p>
                                                        <p>IČO: {record.ico}</p>
                                                        <p>PF: {record.Pf}</p>
                                                        <p>PDPH: {record.PDph}</p>
                                                    
                                                </div>
                                            </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                )}
                            </div>
                        )}
                    </div>
                </section>
                <div className="forms">
                <form id="nameForm" onSubmit={this.handleNameSubmit}>
                                {/* <label>Name  */}
                                    <input type="text" className="inputName" placeholder="Search by Name" value={this.state.Textvalue} onChange={this.handleNameChange} />
                                 {/* </label> */}
                                    <input type="submit" value="Submit" />
                                </form>

                                <form id="icoForm" onSubmit={this.handleICOSubmit}>
                                {/* <label>IČO */}
                                    <input type="number" className="inputICO" placeholder="Search by IČO" value={this.state.value} onChange={this.handleICOChange} />
                                 {/* </label> */}
                                    <input type="submit" value="Submit" />
                                </form>
                                </div>
            </div>
           </div>
           
        )
    }
}
    
export default Home;
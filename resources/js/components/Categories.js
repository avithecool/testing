
import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import link from 'react-router-dom';
export default class Categories extends Component {
    constructor()
    {
      super();
      this.state={
        data: [],
      }
    }

    componentDidMount()
    {
      axios.get('http://localhost:2000/manager/catlist/')
      .then(
          response=>{this.setState({data:response.data })
      });
      }
        deleteRow(ele,id)
      {
        alert(id);
     }

    render() {
       var items = this.state.data ;
       return (
           <div className="table">
                    <table className="table">
                     <tr>
                        <th>
                            Id
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Desription
                        </th>
                        <th>Actions</th>
                        </tr>
                        <tbody>
                            {
                                items.map(cat=>{
                                    return (
                        <tr ref="catid{{cat.id}}">
                        <td>
                                                        {cat.id}
                       </td>
                       <td>
                                {cat.name}
                        </td>
                        <td>
                            {cat.description}
                        </td>
                        <td>
                            <button  onClick={() => this.deleteRow(this,'catid'+cat.id)} >Delete Row</button>
                         </td>
                        </tr>

                                    )})
                                }

                        </tbody>
                    </table>
            </div>
       );
     }
}
if (document.getElementById('categoriescontent')) {

    ReactDOM.render(<Categories />, document.getElementById('categoriescontent'));
}

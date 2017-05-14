import React, { Component } from 'react';
import Plane from "./Components/Plane";

let imgUrl = require('./images/PlaneImage.jpg');

const divStyle = {
	backgroundImage: 'url(' + imgUrl + ')',
	width: "100%",
	height: "1000px",
	backgroundSize: "100% 100%"
}

class App extends Component {
  render() {
    return (
	<div style={divStyle}>
		<Plane />
	</div>
    );
  }
}

export default App;

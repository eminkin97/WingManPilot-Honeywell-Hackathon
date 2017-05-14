import React, { Component } from 'react';
import $ from 'jquery';

const divStyle1 = {
	backgroundColor: 'red',
	width: '30px',
	height: '30px',
	top: '520px',
	left: '520px',
	position: 'relative'
}

const divStyle2 = {
	backgroundColor: 'red',
	width: '30px',
	height: '30px',
	top: '280px',
	left: '1050px',
	position: 'relative',
}

const divStyle3 = {
	backgroundColor: 'red',
	width: '30px',
	height: '30px',
	top: '700px',
	left: '1050px',
	position: 'relative',
}

const divStyle4 = {
	backgroundColor: 'red',
	width: '30px',
	height: '30px',
	top: '500px',
	left: '1380px',
	position: 'relative',
}

const divStyle5 = {
	backgroundColor: 'red',
	width: '30px',
	height: '30px',
	top: '350px',
	left: '1380px',
	position: 'relative',
}

const divStyle6 = {
	backgroundColor: 'red',
	width: '30px',
	height: '30px',
	top: '380px',
	left: '1500px',
	position: 'relative',
}

const divStyle7 = {
	backgroundColor: 'red',
	width: '30px',
	height: '30px',
	top: '350px',
	left: '900px',
	position: 'relative',
}

const divStyle8 = {
	backgroundColor: 'red',
	width: '30px',
	height: '30px',
	left: '1150px',
	top: '660px',
	position: 'relative',
}

const divStyle9 = {
	backgroundColor: 'red',
	width: '30px',
	height: '30px',
	position: 'absolute',
	left: '1150px',
	top: '180px',
}

class Plane extends Component {
	constructor() {
		super();
		this.state = {
			boxColor: ['red', 'red', 'red', 'red', 'red', 'red', 'red', 'red', 'red'],	
		}
	}
	onClick(id, idNumb) {
		console.log(id);
		if (this.state.boxColor[idNumb-1] == 'red') {
			document.getElementById(id).style.backgroundColor = 'green';
			var array = this.state.boxColor;
			array[idNumb-1] = 'green';
			this.setState({boxColor: array});

			$.ajax({
				type: "POST",
				url: "http://design.cs.rutgers.edu:8000/app",
				data: "sensor_id=" + idNumb + "&sensor_stat='Operational'&sensor_msg='Operational'",
				success: function() {
					console.log("Request successfully POSTED to server");
				},
				error: function() {
					console.log("Request failed to POST to server");
				},
			});

		}
		else {	//box is green; Change to red
			document.getElementById(id).style.backgroundColor = 'red';
			var array = this.state.boxColor;
			array[idNumb - 1] = 'red';
			this.setState({boxColor: array});
			
			$.ajax({
				type: "POST",
				url: "http://design.cs.rutgers.edu:8000/app",
				data: "sensor_id=" + idNumb + "&sensor_stat='FATAL'&sensor_msg='FATAL'",
				success: function() {
					console.log("Request successfully POSTED to server");
				},
				error: function() {
					console.log("Request failed to POST to server");
				},
			});
		}
	}

	render() {
		return(
			<div>
				<div id="NoseGearTaxi" style={divStyle1} onClick = {() => this.onClick("NoseGearTaxi", 1)}></div>
				<div id="WingIllumination1" style={divStyle2} onClick = {() => this.onClick("WingIllumination1", 2)}></div>
				<div id="WingIllumination2" style={divStyle3} onClick = {() => this.onClick("WingIllumination2", 3)}></div>
				<div id="EscapeSlide1" style={divStyle4} onClick = {() => this.onClick("EscapeSlide1", 4)}></div>
				<div id="EscapeSlide2" style={divStyle5} onClick = {() => this.onClick("EscapeSlide2", 5)}></div>
				<div id="WhiteStrobe" style={divStyle6} onClick = {() => this.onClick("WhiteStrobe", 6)}></div>
				<div id="RedAnticollision" style={divStyle7} onClick = {() => this.onClick("RedAnticollision", 7)}></div>
				<div id="RedWingTip" style={divStyle8} onClick = {() => this.onClick("RedWingTip", 8)}></div>
				<div id="GreenWingTip" style={divStyle9} onClick = {() => this.onClick("GreenWingTip", 9)}></div>
			</div>
		);
	}
}

export default Plane;

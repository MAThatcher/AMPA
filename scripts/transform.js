function transform(item, value) {

	var return_val = 0;

	if(item == "permit") {
		switch(value) {
			case "Yes":
				return_val = 0;
				break;
			case "No":
				return_val = 10;
				break;
			default:
				break;
		}
		return return_val;
	}

	else if(item == "age") {
		switch(value) {
			case "Before 1980":
				return_val = 5;
				break;
			case "1980-1990":
			 return_val = 4;
				break;
			case "1990-2000":
				return_val = 3;
				break;
			case "2000-2010":
				return_val = 2;
				break;
			case "2010-2017":
				return_val = 1;
				break;
			case "2017 to Present":
				return_val = 0;
				break;
			case "Don't know":
				return_val = 5;
				break;
			default:
				break;
		} 
		return return_val;
	}

	else if(item == "prox") {
		switch(value) {
			case "Under 50ft":
				return_val = 10;
				break;
			case "50-100ft":
				return_val = 7;
				break;
			case "100-150ft":
				return_val = 2;
				break;
			case "150-200ft":
				return_val = 1;
				break;
			case "Don't know":
				return_val = 10;
				break;
			default:
				break;
		} 
		return return_val;
	}

	else if(item == "comp") {
		switch(value) {
			case "Yes":
				return_val = 0;
				break;
			case "No":
				return_val = 10;
				break;
			default:
				break;
		} 
		return return_val;
	}

	else if(item == "cond") {
		switch(value) {
			case "Good":
				return_val = 1;
				break;
			case "Moderate":
				return_val = 3;
				break;
			case "Poor":
				return_val = 5;
				break;
			case "Failing":
				return_val = 7;
				break;
			case "Don't know":
				return_val = 7;
				break;
			default:
				break;
		} 
		return return_val;
	}

	else if(item == "soil") {
		switch(value) {
			case "Zone-4":
				return_val = 5;
				break;
			case "Zone-3":
				return_val = 2;
				break;
			case "Zone-2":
				return_val = 1;
				break;
			case "Zone-1":
				return_val = 5;
				break;
			case "Don't know":
				return_val = 5;
				break;
			default:
				break;
		}
		return return_val; 
	}

	else if(item == "slope") {
		switch(value) {
			case "0-5%":
				return_val = 1;
				break;
			case "5-10%":
				return_val = 2;
				break;
			case "10-15%":
				return_val = 3;
				break;
			case "15-20%":
				return_val = 4;
				break;
			case "20-30%":
				return_val = 5;
				break;
			case "Don't know":
				return_val = 5;
				break;
			default:
				break;
		} 
		return return_val;
	}

}
/*
# Insert slashes automatically in date string

Inserts slashes in a date string entered into an input element #birthday.

Format: `dd/mm/yyyy`

*/


document.querySelector('#birthday').addEventListener("input", e => {

	if ( /^\d{0,1}$/.test(e.target.value) ) {
		e.target.oldValue = e.target.value;
		e.target.oldSelectionStart = e.target.selectionStart;
		e.target.oldSelectionEnd = e.target.selectionEnd;
	}
	else if ( /^\d{2}$/.test(e.target.value) && /^\d{1}$/.test(e.target.oldValue) ) {
		e.target.value = e.target.value + '/';
		e.target.oldValue = e.target.value;
		e.target.oldSelectionStart = e.target.selectionStart;
		e.target.oldSelectionEnd = e.target.selectionEnd;
	}

	else if ( /^\d{2}\/\d{0,1}$/.test(e.target.value) ) {
		e.target.oldValue = e.target.value;
		e.target.oldSelectionStart = e.target.selectionStart;
		e.target.oldSelectionEnd = e.target.selectionEnd;
	}
	else if ( /^\d{2}\/\d{2}$/.test(e.target.value) && /^\d{2}\/\d{1}$/.test(e.target.oldValue) ) {
		e.target.value = e.target.value + '/';
		e.target.oldValue = e.target.value;
		e.target.oldSelectionStart = e.target.selectionStart;
		e.target.oldSelectionEnd = e.target.selectionEnd;
	}


	else if ( /^\d{2}\/?\d{0,2}$/.test(e.target.value) ) {
		e.target.oldValue = e.target.value;
		e.target.oldSelectionStart = e.target.selectionStart;
		e.target.oldSelectionEnd = e.target.selectionEnd;
	}
	else if ( /^\d{2}\/\d{2}\/?\d{0,4}$/.test(e.target.value) ) {
		e.target.oldValue = e.target.value;
		e.target.oldSelectionStart = e.target.selectionStart;
		e.target.oldSelectionEnd = e.target.selectionEnd;
	}
	else if (e.target.hasOwnProperty("oldValue")) {
		e.target.value = e.target.oldValue;
		e.target.setSelectionRange(e.target.oldSelectionStart, e.target.oldSelectionEnd);
	}

});

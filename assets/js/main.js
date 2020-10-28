var cleave = new Cleave('.amount', {
  numeral: true,
  swapHiddenInput: true
});

var cleave = new Cleave('.camount', {
  numeral: true,
  swapHiddenInput: true
});


var cleave = new Cleave('.creditcard', {
    creditCard: true,
    delimiter: '-',
    swapHiddenInput: true
});

var cleave = new Cleave('.userid', {
    blocks: [4, 5, 4],
		numericOnly: true,
    swapHiddenInput: true
});

var cleave = new Cleave('.phone', {
    blocks: [4, 4],
		numericOnly: true,
    swapHiddenInput: true
});


var cleave = new Cleave('.tin', {
    blocks: [7, 1],
    delimiter: '-',
		numericOnly: true,
    swapHiddenInput: true
});

var cleave = new Cleave('.cvv', {
    blocks: [3],
		numericOnly: true,
    swapHiddenInput: true
});

var mascara = function (valor) {
    valor = valor.split(":");
    return (parseInt(valor[0]) > 19)? "HZ:M0" : "H0:M0";
}

pattern = {
    onKeyPress: function(valor, e, field, options) {
        field.mask(mascara.apply({}, arguments), options);
    },
    translation: {
        'H': { pattern: /[0-2]/, optional: false },
        'Z': { pattern: /[0-3]/, optional: false },
        'M': { pattern: /[0-5]/, optional: false }
    },
    placeholder: 'hh:mm'
};

var data = function (valorData) {
    valorData = valorData.split(":");
    return (parseInt(valorData[0]) > 19)? "00/00/0000" : "00/00/0000";
}

$(document).ready(function () {
  $("#hora").mask(mascara, pattern);
  $("#dia").mask(data);
  $("#mes").mask(data);
  $("#ano").mask("9999");
	
});


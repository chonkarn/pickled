$('form')
  .form({
    on: 'blur',
    fields: {
      regex: {
        identifier  : 'patient_id',
        rules: [
          {
            type   : 'regExp[/[0-9]{13}/]',

            prompt : 'Please enter an integer value'
          }
        ]
      }
    }
  })
;

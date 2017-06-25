$('form')
  .form({
    on: 'blur',
    fields: {
      patient_id: {
        identifier  : 'patient_id',
        rules: [
          {
            type   : 'regExp[/[0-9]{13}/]',
            prompt : 'กรอกรหัสบัตรประชาชนให้ครบ 13 หลัก'
          }
        ]
      },
      tel_home: {
        identifier  : 'tel_home',
        rules: [
          {
            type   : 'regExp[/0[0-9]{8}/]',
            prompt : 'กรอกเบอร์โทรศัพท์บ้านให้ครบ 9 หลัก'
          }
        ]
      },
      tel_mobile: {
        identifier  : 'tel_mobile',
        rules: [
          {
            type   : 'regExp[/0[0-9]{9}/]',
            prompt : 'กรอกเบอร์โทรศัพท์เคลื่อนที่ให้ครบ 10 หลัก'
          }
        ]
      }
      // regex: {
      //   identifier  : 'relate_tel',
      //   rules: [
      //     {
      //       type   : 'regExp[/0[0-9]{8,9}/]',
      //       prompt : 'กรอกเบอร์โทรศัพท์ของญาติให้ครบ 10 หลัก'
      //     }
      //   ]
      // }
    }
  })
;

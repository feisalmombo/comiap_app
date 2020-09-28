const validate = values => {
    const errors = {}
    if (!values.own_behalf) {
      errors.own_behalf = 'Required'
    }
    if (!values.fullname) {
        errors.fullname = 'Required'
    }
    if (!values.email) {
      errors.email = "Required"
    }
    if (!values.phone) {
      errors.phone = "Required"
    }
    if (!values.ethnicity) {
      errors.ethnicity = "Required"
    }

    return errors
  }
  
  export default validate  
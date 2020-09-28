import React, { useState } from 'react'
import { connect } from 'react-redux'
import { sitesSearch } from '../../redux/actions/data/sites-actions'

var Form = ({ searchSites, sites }) => {
    const [zipCodeLg, setZipCodeLg] = useState("")
    const [zipCodeSm, setZipCodeSm] = useState("")

    return (
        <React.Fragment>
            <div id="zipform" className="d-none d-md-block">
                <div style={{ opacity:0.85 }}>
                    <div id="card-header" className="card my-2 shadow" style={{ borderRadius:"10px" }}>
                        <div className="card-body">
                            <h1 className="text-dark"  style={{ fontWeight:300, fontSize:"29px", lineHeight:"34px"}}>Testing Site Locator</h1>
                        </div>
                    </div>

                    <div className="card shadow" style={{ borderRadius:"10px" }}>
                        <div className="card-body">
                            <p>Please Enter Your Zip Code to Locate a Testing Site</p>
                            <div className="form-group">
                                <label for="zipcode" className="label-control">Enter your Zip code</label>
                                <input type="text" name="zip" className="form-control rounded-pill mb-2" onChange={(e) => setZipCodeLg(e.target.value)} value={zipCodeLg}/>
                                <button type="submit" className="btn btn-primary px-5 " onClick={() => searchSites(zipCodeLg)} disabled={sites.isLoading}>Locate</button>
                                <a href="/" className="text-dark px-5" style={{ fontWeight:300 }}>Go <strong style={{ fontWeight:500 }}>Home</strong></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="zipform-small" class="d-md-none">
                <div style={{ opacity:0.85 }}>
                    <div className="card shadow" style={{ borderRadius:"10px" }}>
                        <div className="card-body">
                            <div className="form-group">
                                <input type="text" name="zip" className="form-control rounded-pill" placeholder="Enter your Zip code" onChange={(e) => setZipCodeSm(e.target.value)} value={zipCodeSm}/>
                            </div>
                            <button type="submit" className="btn btn-primary  btn-sm px-2" onClick={() => searchSites(zipCodeSm)} disabled={sites.isLoading}>Locate</button>
                            <a href="/" className="text-dark  text-sm px-2" style={{ fontWeight:300 }}>Go <strong style={{ fontWeight:500 }}>Home</strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </React.Fragment>
    )
}

const mapStateToProps = (state) => ({
    sites: state.sites
})

const mapDispatchToProps = (dispatch) => ({
    searchSites: (zipcode) => dispatch(sitesSearch(zipcode))
})

Form = connect(mapStateToProps, mapDispatchToProps)(Form)

export default Form
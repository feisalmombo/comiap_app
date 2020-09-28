import React from 'react';
import ReactDOM from 'react-dom';

const Example = () => {
    return (
        <div className="row justify-content-center">
            <div className="col-md-12">
                <div className="card">
                    
                    <div className="card-body">
                        <h3 className="card-title">Questionnaire Setup Wizard</h3>
                        I'm an example component!
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}

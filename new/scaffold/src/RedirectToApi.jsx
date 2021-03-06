import React from 'react';
import {withRouter} from "react-router-dom";
import ajax from './utils/ajax';

class RedirectToApi extends React.Component {

    state = {
        resource: []
    };


    componentDidMount() {
        this.handleFetchJsonFromApi();
    }

    handleFetchJsonFromApi = () => {
        const resource = this.props.match.params.resource;
        const index = this.props.match.params.App;

        if (index === null || index === undefined) {
            ajax.get(`/${resource}` )
                .then((res) => {
                    const data = res.data;
                    console.log(data);
                    this.setState({resource: data});
                })
                .catch((err)=> {
                    console.log(err);
                })
        }
        else {
            ajax.get(`/${resource}/${index}` )
                .then((res) => {
                    const data = res.data;
                    console.log(data);
                    this.setState({resource: data});
                })
                .catch((err)=> {
                    console.log(err);
                })
        }


    };


    render() {
        return (
            <div>
                <pre style={{  margin: '0', fontSize: '1rem'}}>
                    {JSON.stringify(this.state.resource, null, 2) }
                </pre>
            </div>
        );
    }

}

export default withRouter(RedirectToApi);
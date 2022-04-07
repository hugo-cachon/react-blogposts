import { Component } from "react";
export default class ArticleForm extends Component {
    constructor(props) {
        super(props);
        this.state = {
            title: "",
            content: ""
        };
        this.handleChangeTitle = this.handleChangeTitle.bind(this);
        this.handleChangeContent = this.handleChangeContent.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }
    handleChangeTitle(event) {
        this.setState({ title: event.target.value });
    }
    handleChangeContent(event) {
        this.setState({ content: event.target.value });
    }
    handleSubmit(event) {
        alert('Le nom a été soumis : ' + this.state);
        event.preventDefault();
    }
    render() {
        return (<form style={{ maxWidth: "18rem" }} onSubmit={this.handleSubmit}>
                <div className="card bg-light mb-3">
                    <div className="card-header" style={{ color: "black" }}>
                    <div className="form-group">
                        <label style={{ paddingRight: "1rem" }}>Title</label>
                        <input onChange={this.getTitle} type="text" className="form-controle" placeholder="Write your title here..."></input>
                    </div>
                </div>
                <div className="card-body">
                <div className="form-group">
                    <label>Content</label>
                    <textarea style={{ resize: "none" }} className="form-control" id="exampleFormControlTextarea1" rows={3} placeholder="Write your post here..."></textarea>
                </div>
                    <button type={"submit"} className="btn btn-primary">Post</button>
                </div>
                </div>
            </form>);
    }
}

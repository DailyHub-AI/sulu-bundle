import React from 'react';
import {observer} from 'mobx-react';
import {action, observable} from 'mobx';
import Requester from 'sulu-admin-bundle/services/Requester';

@observer
export default class Chat extends React.Component {
    @observable prompt = '';
    @observable chat;

    @action
    send() {
        const prompt = this.prompt;
        this.prompt = '';

        Requester.post('/admin/api/chat', {prompt})
            .then((response) => response.json())
            .then(action((chat) => this.chat = chat));
    }

    componentDidMount() {
        Requester.get('/admin/api/chat')
            .then((response) => response.json())
            .then(action((chat) => this.chat = chat));
    }

    render() {
        return (
            <>
                <h1>Chat</h1>

                <div>
                </div>

                <input
                    type="text"
                    value={this.prompt}
                    onChange={action((e) => this.prompt = e.target.value)}
                    onKeyPress={(e) => event.key === 'Enter' && this.send()}
                />
            </>
        );
    }
}

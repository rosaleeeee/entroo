import React from "react";

const Message = ({ userId, message }) => {
    const isUserMessage = userId === message.user_id;

    return (
        <div className={`row ${isUserMessage ? "justify-content-end" : ""}`}>
            <div className="tttt" >
            <small className={`cla3 ${isUserMessage ? "cla3-primary" : "cla3-secondary"}`}>
                    {message.time}
                </small></div>
            <div className={`cla1 ${isUserMessage ? "cla1-primary" : "cla1-secondary"}`}>
                <small className="cla2">
                    <strong>{message.user.name}</strong>
                </small>
                <div className={`alert alert-${isUserMessage ? "primary" : "secondary"}`} role="alert">
                    {message.text}
                </div>
            </div>
        </div>
    );
};

export default Message;

import React from "react";
import ReactDOM from "react-dom/client";

function App() {
    return (
        <div>
            <h1>React funcionando 🚀</h1>
        </div>
    );
}

const el = document.getElementById("react-root");

if (el) {
    ReactDOM.createRoot(el).render(<App />);
}
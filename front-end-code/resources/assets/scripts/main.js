/** import external dependencies */
import popper from "@popperjs/core";
import bootstrap from "bootstrap";

/** import local dependencies */
import Router from "./util/Router";
import common from "./routes/common";

/**
 * Populate Router instance with DOM routes
 * @type {Router} routes - An instance of our router
 */
const routes = new Router({
	/** All pages */
	common,
});

/** Load Events */
document.addEventListener("DOMContentLoaded", () => routes.loadEvents());

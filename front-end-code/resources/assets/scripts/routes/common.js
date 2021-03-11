export default {
	init() {
		const sidebarToggle = document.getElementById("sidebar-toggler");
		const mainWrapper = document.getElementById("main");
		const mainWrapperClass = "sidebar-hidden";

		if (sidebarToggle) {
			const toggleSidebarFn = (currentElm, overrideCollapse, viewportSize = "") => {
				const parentElm = currentElm.parentNode;
				const elmDataset = currentElm.dataset;
				const sidebarTarget = elmDataset.target;
				const closedButtonClass = ["start-100", "top-0"];
				const openButtonClass = ["bottom-0", "start-0"];

				if (sidebarTarget) {
					const sidebarTargetElm = document.querySelector(sidebarTarget);
					let isCollapsed = sidebarTargetElm.dataset.collapsed === "true";
					if (overrideCollapse) isCollapsed = overrideCollapse;
					const sidebarWidth = parseInt(sidebarTargetElm.offsetWidth - 1);

					if (!isCollapsed) {
						mainWrapper.classList.add(mainWrapperClass);
						sidebarTargetElm.dataset.collapsed = "true";

						if (viewportSize === "mobile") sidebarTargetElm.style.marginLeft = `-100%`;
						else sidebarTargetElm.style.marginLeft = `-${sidebarWidth}px`;
						parentElm.classList.remove(...openButtonClass);
						parentElm.classList.add(...closedButtonClass);
					} else {
						mainWrapper.classList.remove(mainWrapperClass);
						sidebarTargetElm.dataset.collapsed = "false";
						sidebarTargetElm.style.marginLeft = null;
						parentElm.classList.remove(...closedButtonClass);
						parentElm.classList.add(...openButtonClass);
					}
				}
			};

			sidebarToggle.addEventListener("click", (e) => {
				e.preventDefault();
				toggleSidebarFn(e.currentTarget);
			});

			if (window.innerWidth <= 768) {
				if (!mainWrapper.classList.contains(mainWrapperClass)) {
					mainWrapper.classList.add(mainWrapperClass);
					toggleSidebarFn(sidebarToggle, false, viewportSize);
				}
			}

			const checkWinSize = (vpWidth) => {
				if (vpWidth < 768) return "mobile";
				if (vpWidth <= 992 && vpWidth >= 768) return "tablet";
				return "desktop";
			};

			const winWidth = window.innerWidth;
			let viewportSize = checkWinSize(winWidth);

			window.addEventListener("resize", () => {
				const newWinWidth = window.innerWidth;
				const newVPSize = checkWinSize(newWinWidth);

				if (viewportSize !== newVPSize) {
					viewportSize = newVPSize;
					if (newVPSize === "mobile") {
						if (!mainWrapper.classList.contains(mainWrapperClass)) {
							mainWrapper.classList.add(mainWrapperClass);
							toggleSidebarFn(sidebarToggle, false, newVPSize);
						}
					} else {
						mainWrapper.classList.remove(mainWrapperClass);
						toggleSidebarFn(sidebarToggle, false, newVPSize);
					}
				}
			});
		}
	},
	finalize() {
		// JavaScript to be fired on all pages, after page specific JS is fired
	},
};

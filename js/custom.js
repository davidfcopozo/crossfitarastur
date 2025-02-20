const d = document;
// Create separate controllers for different groups of listeners
const scrollController = new AbortController();
const navController = new AbortController();

// Cleanup function
const cleanup = () => {
  scrollController.abort();
  navController.abort();
};

d.addEventListener("DOMContentLoaded", () => {
  "use strict";

  /*************************** Navbar scroll behavior ***************************/
  const main = d.getElementById("main");
  const mainBottom = main ? main.offsetTop : 0;
  const navbar = d.querySelector(".navbar");

  window.addEventListener(
    "scroll",
    () => {
      const stop = Math.round(window.scrollY);
      if (stop > mainBottom) {
        navbar.classList.add("past-main", "effect-main");
      } else {
        navbar.classList.remove("past-main");
      }
    },
    { signal: scrollController.signal }
  );

  // Bootstrap 5 navbar collapse
  const navLinks = d.querySelectorAll(".nav-link");
  const menuToggle = d.getElementById("navbarCollapse");
  const bsCollapse = new bootstrap.Collapse(menuToggle, { toggle: false });

  navLinks.forEach((l) => {
    l.addEventListener(
      "click",
      () => {
        bsCollapse.hide();
      },
      { signal: navController.signal }
    );
  });

  /*************************** Active page ***************************/

  const pathName = window.location.pathname.split("/");
  let page = pathName[pathName.length - 1];

  const link = d.querySelector('a[href="' + page + '"]');

  if (page !== "" && page !== "index.php") {
    link.classList.add("active-page");
    link.ariaSelected = "true";
  }

  /*************************** Scroll To Top ***************************/
  const backTop = d.getElementById("back-top");

  if (backTop) {
    window.addEventListener("scroll", () => {
      if (window.scrollY > 1000) {
        //Height of the whole content
        let scrollHeight = d.body.scrollHeight;

        //Where I've scrolled to (window.scrollY is the scrolled position and window.innerHeight the height of the visible content)
        let scrolledTo = window.scrollY + window.innerHeight;
        backTop.style.display = "flex";

        if (scrollHeight - scrolledTo > 24) {
          backTop.style.bottom = "20px";
        } else {
          backTop.style.bottom = "80px";
        }
      } else {
        backTop.style.display = "none";
      }
    });

    backTop.addEventListener("click", (e) => {
      e.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    });
  }

  /*************************** Parallax scroll effect for hero section ***************************/
  const heroSection = d.querySelector(".hero-parallax");
  window.addEventListener("scroll", () => {
    const scrollPosition = window.scrollY;
    if (heroSection) {
      heroSection.style.backgroundPositionY = `${scrollPosition * 0.5}px`;
    }
  });
  let path = window.location.pathname.split("/");

  if (path[path.length - 1] === "politica-de-privacidad.php") {
    const navbar = d.querySelector(".navbar");
    navbar.style.backgroundColor = "#00909b";
  }

  window.addEventListener("unload", cleanup, { once: true });
});

/************************************** Blog Masonry **************************************/

const pathName = window.location.pathname.split("/");
let page = pathName[pathName.length - 1];
const galleryItems = [
  {
    type: "large",
    image: "crossfit_arastur_primera_clase.webp",
    category: "Crossfit y Principiantes",
    title: "¿Cómo afrontar mi primera clase de crossfit?",
    link: "blog/como-afrontar-primera-clase-de-crossfit.php",
    date: "2/15/2025",
  },
  {
    type: "instagram",
    category: "Gym & Crossfit",
    title:
      "Sigue nuestras clases en Instagram #crosstraining #functionalfitness",
    link: "https://www.instagram.com/crossfitarastur/?hl=en",
    date: "2/15/2025",
  },
  {
    type: "small",
    image: "blog-4.webp",
    category: "Hostoria & Crossfit",
    title: "Orígenes del Crossfit",
    link: "origenes-del-crossfit.php",
    date: "2/15/2025",
  },
  {
    type: "xls-large",
    image: "crossfit-history.webp",
    category: "Crossfit & Nomenclaturas del Crossfit",
    title: "WOD, box, AMRAP, Time cap… ¿qué quieren decir estas palabras?",
    link: "que-son-wod-box-amrap-time-cap.php",
    date: "2/15/2025",
  },
];

let dynamicGallery =
  page === "blog.php" ? galleryItems : galleryItems.slice(0, 4);

// Function to create masonry items
function createMasonryItems() {
  const container = d.getElementById("masonry-container");

  dynamicGallery.forEach((item) => {
    // Create the main column element
    const columnDiv = d.createElement("div");
    columnDiv.className = "col-lg-4 col-md-6 grid-item masonry-item";

    // Create blog item div with appropriate class based on type
    const blogItemDiv = d.createElement("div");
    blogItemDiv.className = `blog-item ${item.type}-item`;

    // Set background image if it exists
    if (item.image) {
      blogItemDiv.setAttribute("data-setbg", item.image);
      blogItemDiv.style.backgroundImage = `url(../images/${item.image})`;
    }

    // Create the link element
    const linkElement = d.createElement("a");
    linkElement.href = item.link;
    linkElement.className =
      item.type === "instagram" ? "instagram-text" : "blog-text";
    if (item.type === "instagram") {
      linkElement.target = "_blank";
    }

    // Create categories div
    const categoriesDiv = d.createElement("div");
    categoriesDiv.className = "categories";
    if (item.type === "instagram") {
      const categoryParagraph = d.createElement("p");
      categoryParagraph.textContent = item.category;
      categoriesDiv.appendChild(categoryParagraph);

      const instagramIcon = d.createElement("i");
      instagramIcon.className = "fa fa-instagram";
      categoriesDiv.appendChild(instagramIcon);
    } else {
      categoriesDiv.textContent = item.category;
    }

    const heading = d.createElement("h5");
    heading.textContent = item.title;

    linkElement.appendChild(categoriesDiv);
    linkElement.appendChild(heading);
    blogItemDiv.appendChild(linkElement);
    columnDiv.appendChild(blogItemDiv);
    container.appendChild(columnDiv);
  });
}

// Masonry layout function
function resizeMasonryItem(item) {
  const grid = d.querySelector(".masonry");
  const rowGap = parseInt(
    window.getComputedStyle(grid).getPropertyValue("grid-row-gap")
  );
  const rowHeight = parseInt(
    window.getComputedStyle(grid).getPropertyValue("grid-auto-rows")
  );
  const content = item.querySelector(".blog-item");
  const rowSpan = Math.ceil(
    (content.getBoundingClientRect().height + rowGap) / (rowHeight + rowGap)
  );
  let finalRowSpan = rowSpan < 8 ? 10 : rowSpan;
  item.style.gridRowEnd = "span " + finalRowSpan;
}

function resizeAllMasonryItems() {
  const allItems = d.getElementsByClassName("masonry-item");
  for (let i = 0; i < allItems.length; i++) {
    resizeMasonryItem(allItems[i]);
  }
}

d.addEventListener("DOMContentLoaded", () => {
  createMasonryItems();

  // Add event listeners for masonry layout
  const masonryEvents = ["load", "resize"];
  masonryEvents.forEach((e) => {
    window.addEventListener(e, resizeAllMasonryItems);
  });

  setTimeout(resizeAllMasonryItems, 100);
});

/************************************** FORM **************************************/
// Fetch all the forms we want to apply custom Bootstrap validation styles to
const forms = d.querySelectorAll(".needs-validation");

// Replace the existing form submission code with this:
Array.from(forms).forEach((form) => {
  form.addEventListener(
    "submit",
    async (event) => {
      event.preventDefault();

      if (!form.checkValidity()) {
        event.stopPropagation();
        form.classList.add("was-validated");
        return;
      }

      try {
        // Check if reCAPTCHA is loaded
        if (typeof grecaptcha === "undefined") {
          throw new Error(
            "reCAPTCHA no está cargado. Por favor, actualice la página."
          );
        }

        // Get reCAPTCHA token
        const token = await grecaptcha.execute(
          "6Lehe90qAAAAAPEWmVnvUJSDBVOK3j4EfIyNyBjK",
          {
            action: "formulario",
          }
        );

        // Add token to form data
        const formData = new FormData(form);
        formData.append("recaptcha_response", token);

        // Send the form data
        const response = await fetch("proceso-contacto.php", {
          method: "POST",
          body: formData,
        });

        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }

        const data = await response.json();

        if (data.success) {
          // Show success modal
          const feedbackModal = new bootstrap.Modal(
            document.getElementById("feedback")
          );
          feedbackModal.show();

          // Reset form
          form.reset();
          form.classList.remove("was-validated");
        } else {
          throw new Error(data.message || "Error desconocido");
        }
      } catch (error) {
        console.error("Error:", error);
        alert(`Error al enviar el formulario: ${error.message}`);
      }
    },
    false
  );
});
/************************************** COPYRIGTH DATE **************************************/
let date = new Date(),
  time = d.querySelector(".copy-time"),
  year = date.getFullYear();

time.textContent = year;
time.setAttribute("datetime", year);

/************************************** SCHEDULE *************************************/

// Day mappings with both tab and content IDs
const daysMap = {
  LUNES: {
    tabId: "nav-monday-tab",
    contentId: "nav-monday",
  },
  MARTES: {
    tabId: "nav-tuesday-tab",
    contentId: "nav-tuesday",
  },
  MIERCOLES: {
    tabId: "nav-wednesday-tab",
    contentId: "nav-wednesday",
  },
  JUEVES: {
    tabId: "nav-thursday-tab",
    contentId: "nav-thursday",
  },
  VIERNES: {
    tabId: "nav-friday-tab",
    contentId: "nav-friday",
  },
  SABADO: {
    tabId: "nav-saturday-tab",
    contentId: "nav-saturday",
  },
};

function setActiveTab() {
  const currentDay = new Date().getDay();

  let tabToActivate;
  switch (currentDay) {
    case 0:
    case 1:
      tabToActivate = "LUNES";
      break;
    case 2:
      tabToActivate = "MARTES";
      break;
    case 3:
      tabToActivate = "MIERCOLES";
      break;
    case 4:
      tabToActivate = "JUEVES";
      break;
    case 5:
      tabToActivate = "VIERNES";
      break;
    case 6:
      tabToActivate = "SABADO";
      break;
  }

  // Remove active class from all tabs and content
  d.querySelectorAll(".nav-link").forEach((tab) => {
    tab.classList.remove("active");
    tab.setAttribute("aria-selected", "false");
  });
  d.querySelectorAll(".tab-pane").forEach((pane) => {
    pane.classList.remove("show", "active");
  });

  // Add active class to current day's tab and content
  const activeTabInfo = daysMap[tabToActivate];
  const activeTab = d.getElementById(activeTabInfo.tabId);
  const activeContent = d.getElementById(activeTabInfo.contentId);

  if (activeTab && activeContent) {
    activeTab.classList.add("active");
    activeTab.setAttribute("aria-selected", "true");
    activeContent.classList.add("show", "active");
  }
}

async function fetchSheetData() {
  try {
    const response = await fetch("api.php");
    if (!response.ok) {
      throw new Error("Network response was not ok " + response.statusText);
    }
    const data = await response.json();

    // Clear existing content
    Object.values(daysMap).forEach(({ contentId }) => {
      const container = d.querySelector(`#${contentId} .tab-wrapper`);
      if (container) {
        container.innerHTML = "";
      }
    });

    //Every single row (including first, containing hora, lunes, martes, etc)
    const rows = data.values;

    //First row (contains hora, lunes, martes, etc)
    const headers = rows[0].map((header) => header.toUpperCase());

    //All rows but first (headers)
    const timeSlots = rows.slice(1);

    //Get time and activities array
    timeSlots.forEach((slot) => {
      //Get the time
      const time = slot[0];

      // headers.slice(1) days array - Get the activity for each day
      headers.slice(1).forEach((day, index) => {
        const activity = slot[index + 1];

        // If there are activities and a valid day get the container (tab-wrapper) with the given content id ex: nav-monday, nav-tuesday, etc
        if (activity && daysMap[day]) {
          const container = d.querySelector(
            `#${daysMap[day].contentId} .tab-wrapper`
          );

          //If a container is defined on the code block above then create a div contianing the time and activity
          if (container) {
            const box = d.createElement("div");
            box.className = "single-box";
            box.innerHTML = `
                          <div class="single-caption text-center">
                              <div class="caption">
                                  <span>${time}</span>
                                  <h3>${activity}</h3>
                              </div>
                          </div>`;
            container.appendChild(box);
          }
        }
      });
    });

    // Set active tab after content is loaded
    setActiveTab();
  } catch (error) {
    console.error("Error fetching data:", error);
  }
}

fetchSheetData();

/************************************** FAQ ACCORDION **************************************/
d.addEventListener("DOMContentLoaded", () => {
  const details = d.querySelectorAll(".faq-item");

  // Set initial styles for all answers
  details.forEach((detail) => {
    const answer = detail.querySelector(".faq-answer");
    if (!detail.hasAttribute("open")) {
      answer.style.opacity = "0";
      answer.style.transform = "translateY(-10px)";
    }
  });

  details.forEach((detail) => {
    detail.addEventListener("click", (e) => {
      if (e.target.tagName.toLowerCase() === "summary") {
        e.preventDefault();

        const clickedDetail = detail;
        const clickedAnswer = clickedDetail.querySelector(".faq-answer");

        // Close other details
        details.forEach((otherDetail) => {
          if (
            otherDetail !== clickedDetail &&
            otherDetail.hasAttribute("open")
          ) {
            const answer = otherDetail.querySelector(".faq-answer");
            answer.style.opacity = "0";
            answer.style.transform = "translateY(-10px)";

            setTimeout(() => {
              otherDetail.removeAttribute("open");
            }, 400);
          }
        });

        // Toggle current detail
        if (clickedDetail.hasAttribute("open")) {
          clickedAnswer.style.opacity = "0";
          clickedAnswer.style.transform = "translateY(-10px)";

          setTimeout(() => {
            clickedDetail.removeAttribute("open");
          }, 400);
        } else {
          clickedDetail.setAttribute("open", "");
          // Force a reflow to trigger the transition
          clickedAnswer.offsetHeight;
          clickedAnswer.style.opacity = "1";
          clickedAnswer.style.transform = "translateY(0)";
        }
      }
    });

    detail.querySelector("summary").addEventListener("keydown", (e) => {
      const items = Array.from(details);
      const index = items.indexOf(detail);

      switch (e.key) {
        case "ArrowUp":
          e.preventDefault();
          items[index - 1]?.querySelector("summary").focus();
          break;
        case "ArrowDown":
          e.preventDefault();
          items[index + 1]?.querySelector("summary").focus();
          break;
        case "Home":
          e.preventDefault();
          items[0].querySelector("summary").focus();
          break;
        case "End":
          e.preventDefault();
          items[items.length - 1]?.querySelector("summary").focus();
          break;
      }
    });
  });

  /************************************** HERO SECTION BG **************************************/
  const heroSection = d.querySelector(".hero-component-bg");
  if (heroSection) {
    const bgImage = heroSection.getAttribute("data-setbg");
    heroSection.style.backgroundImage = `url(../../images/${bgImage})`;
  }

  /************************************** SCROLL TO FORM **************************************/

  const urlParams = new URLSearchParams(window.location.search);

  if (
    urlParams.has("message") &&
    (page === "contacto.php" || page === "contacto")
  ) {
    const formElement = d.getElementById("form-scroll");

    console.log(formElement);
    if (formElement) {
      formElement.style.scrollMargin = "7rem";
      formElement.scrollIntoView({ behavior: "smooth", top: 80 });
    }
  }
});

/************************************** FOOTER POSTS **************************************/
const opciones = {
  day: "numeric",
  month: "long",
  year: "numeric",
};
const footerBlog = d.querySelector(".footer-blog");

dynamicGallery.forEach((post) => {
  if (post.type !== "instagram") {
    let postDate = new Date(post.date);

    let link = d.createElement("a");
    let h6 = d.createElement("h6");
    let time = d.createElement("time");
    let span = d.createElement("span");
    let icon = d.createElement("i");

    link.classList.add("fb-item");
    link.href = post.link;
    link.target = "_blank";

    h6.textContent = post.title;

    time.dateTime = postDate;

    span.classList.add("blog-time");

    icon.classList.add("fa", "fa-clock-o", "order-2");

    time.innerText = postDate.toLocaleDateString("es-ES", opciones);
    span.appendChild(icon);

    span.appendChild(time);

    link.appendChild(h6);
    link.appendChild(span);
    footerBlog.appendChild(link);
  }
});

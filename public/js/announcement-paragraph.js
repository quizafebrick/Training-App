function toggleContent(event, linkElement) {
    event.preventDefault();
    const contentContainer = linkElement.closest(".announcement-summary");
    const announcementContent = contentContainer.querySelector(
        ".announcement-content"
    );
    const seeMoreLink = contentContainer.querySelector(".see-more");
    const seeLessLink = contentContainer.querySelector(".see-less");

    if (announcementContent.classList.contains("hidden")) {
        announcementContent.classList.remove("hidden");
        seeMoreLink.classList.add("hidden");
        seeLessLink.classList.remove("hidden");
    } else {
        announcementContent.classList.add("hidden");
        seeMoreLink.classList.remove("hidden");
        seeLessLink.classList.add("hidden");
    }
}

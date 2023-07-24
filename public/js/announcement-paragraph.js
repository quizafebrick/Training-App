function toggleContent(event, linkElement) {
    event.preventDefault();
    const contentContainer = linkElement.closest(".text-justify");
    const announcementContent = contentContainer.querySelector(
        ".announcement-content"
    );
    const announcementSummary = contentContainer.querySelector(
        ".announcement-summary"
    );
    const seeMoreLink = contentContainer.querySelector(".see-more");
    const seeLessLink = contentContainer.querySelector(".see-less");

    if (announcementContent.classList.contains("hidden")) {
        contentContainer.classList.remove("max-h-[200px]");
        announcementContent.classList.remove("hidden");
        announcementSummary.classList.add("hidden");
        seeMoreLink.classList.add("hidden");
        seeLessLink.classList.remove("hidden");
    } else {
        contentContainer.classList.add("max-h-[200px]");
        announcementContent.classList.add("hidden");
        announcementSummary.classList.remove("hidden");
        seeMoreLink.classList.remove("hidden");
        seeLessLink.classList.add("hidden");
    }
}

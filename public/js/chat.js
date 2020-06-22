/**
 * @author 5 tech <usis003118@ugb.edu.sv>
 * @file chat.js -> en este archivo esta todo la animacion de la ventana de chat y funsiones de los botones.
 */

/**
 * utilizando jquery para las acciones de la ventana.
 */

const chatbox = jQuery.noConflict();
/**
 * boton para abrir la ventana del chat y el de cerrarlo.
 */

chatbox(() => {
    chatbox(".chatbox-open").click(() =>
        chatbox(".chatbox-popup, .chatbox-close").fadeIn()
    );

    chatbox(".chatbox-close").click(() =>
        chatbox(".chatbox-popup, .chatbox-close").fadeOut()
    );
    /**
     * boton para expander las ventanas de la pequena a la grande.
     */
    chatbox(".chatbox-maximize").click(() => {
        chatbox(".chatbox-popup, .chatbox-open, .chatbox-close").fadeOut();
        chatbox(".chatbox-panel").fadeIn();
        chatbox(".chatbox-panel").css({
            display: "flex"
        });
    });
/**
     * boton para minimizar las ventanas de la grande a la pequeña.
     */
    chatbox(".chatbox-minimize").click(() => {
        chatbox(".chatbox-panel").fadeOut();
        chatbox(".chatbox-popup, .chatbox-open, .chatbox-close").fadeIn();
    });
 /**
     * panel de de los mensajes y en boton de la x de la ventana.
     */
    chatbox(".chatbox-panel-close").click(() => {
        chatbox(".chatbox-panel").fadeOut();
        chatbox(".chatbox-open").fadeIn();
    });
});

